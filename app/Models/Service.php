<?php

namespace App\Models;

use App\Models\Scopes\ServiceScope;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;
class Service extends Model
{
    use HasFactory 
    ,Searchable
     ,SoftDeletes  
     , Prunable ;
    protected $fillable = ["access","type","description","title","location_id","start_time","end_time","start_date","period","photo","status"];

// 
//  يمكنك تضمين بيانات العنوان والمنطقة إذا كنت تريد إظهارها

public function toSearchableArray()
{
    return array_merge($this->toArray(), [
        'id'          => (string) $this->id,  // تحويل id إلى string
        'period'          => (string) $this->period,  // تحويل id إلى string

    ]);
}

public function prunable()
{
  
return static::whereRaw('DATE_ADD(start_date, INTERVAL period DAY) < NOW()');
}
protected static function booted()
{
static::addGlobalScope(new ServiceScope);
}

    public function location(){
        return $this->belongsTo(Location::class);
    }
    public function institution(){
            
            return $this->belongsTo(User::class,"user_id");
  
    }

    public function foodService(){
            
            return $this->hasOne(FoodService::class);
    
    }
    public function educationService(){
      
     
            
            return $this->hasOne(EducationService::class);
  
    }
    public function healthService(){
       
      
            
            return $this->hasOne(related: HealthService::class);

    }
    public function targets(){
       
    
            
            return $this->hasMany(related: EducationTarget::class);

    }
    public function specializations(){
       
        
            return $this->hasMany(related: EducationSpecialization::class);
  
    }
    public function fields(){
       
   
            
            return $this->hasMany(related: HealthField::class);
     
    }

    public function workingDays(): MorphMany
    {
        return $this->morphMany(WorkingDay::class, 'owner');
    }
    
    protected function startTime(): Attribute
    {
     
    
        return Attribute::make(
            set: fn ($value) => Carbon::parse($value)->format('H:i'),
            get: fn ($value) => Carbon::parse($value)->format('H:i'),
        );
    }
    protected function endTime(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Carbon::parse($value)->format('H:i'),
            get: fn ($value) => Carbon::parse($value)->format('H:i'),
        );
    }
    
  public function notes(){
    return $this->hasMany(Note::class);
  }
  public function complaints(){
    return $this->hasMany(Complaint::class);
  }
  public function extensions(){
    return $this->hasMany(ServiceExtension::class);
  }
    
  public function contribution(){
    return $this->morphOne(Contribution::class,"addable");
  }


// scopes
  public function scopeWelcomePage(Builder $query, string $service_type, string $service_sub_type): void
  {
      $query->whereRaw('DATE_ADD(start_date, INTERVAL period DAY) > NOW() AND start_date < NOW()')->whereHas($service_type."Service",function(Builder $query) use($service_type,$service_sub_type){
        
        $query->where(($service_type=="education")?"status" :"type", $service_sub_type);
      });
      
  }
  
  public static function scopeManualLocation(Builder $query)
  {

 
      // استعلام بحث في مواقع `Location` باستخدام العنوان والمنطقة
          $locations = Location::search(Cookie::get("address")." AND ".Cookie::get("region"))
          ->get();  // الحصول على المواقع التي تطابق العنوان والمنطقة
  
   
          $serviceIds = $locations->pluck('id')->toArray(); // الحصول على معرّفات المواقع المتطابقة
  
     
             $query->whereIn('location_id', $serviceIds)
              ->take(3)
              ->get();
  
     
  
    
  }
  

   // دالة لتطبيع النصوص العربية
  public static function normalizeArabic($text) {
    // تحويل الحروف المختلفة إلى تنسيق موحد
    $text = str_replace(['أ', 'إ', 'آ'], 'ا', $text); // توحيد الألفات
    $text = str_replace(['ة'], 'ه', $text); // توحيد الهاء والتاء المربوطة
    $text = str_replace(['ي', 'ى'], 'ي', $text); // توحيد الياء
    $text = preg_replace('/[ًٌٍَُِّ~ْ]/u', '', $text); // إزالة الحركات
    return $text;
}
  public function scopeAutoLocation(Builder $query, string $lat, string $lng): void
  {
    
    $query->whereHas('location', function (Builder $query) use ($lat, $lng) {
      $query->whereRaw(
          "(6371 * acos(cos(radians($lat)) * cos(radians(lat)) * 
          cos(radians(lng) - radians($lng)) + 
          sin(radians($lat)) * sin(radians(lat)))) < ?", [30] // Example: Filter locations within 10 km
      );
  })->orderByDesc("created_at");
      
  }

  

  public function scopeCanShowHidedElements(Builder $query): void
  {
    if(Auth::check()){
      if(Auth::user()->can(["hide services","restore services","delete services","view service contributions"])){
          
          $query->withTrashed();
      }
}
  }

}