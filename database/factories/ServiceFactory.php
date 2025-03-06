<?php

namespace Database\Factories;

use App\Models\EducationService;
use App\Models\EducationSpecialization;
use App\Models\EducationTarget;
use App\Models\FoodService;
use App\Models\HealthField;
use App\Models\HealthService;
use App\Models\InstitutionData;
use App\Models\Location;
use App\Models\ServiceExtension;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Service;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

 
        
      
    public function definition(): array
    {
              // نطاق العمل ( الطبيعي)
              $institutionStartTime = '08:00:00';
              $institutionEndTime = '18:00:00';
         
     

     // توليد تاريخ البدء
     $startDate = fake()->dateTimeBetween('-5 months', '+5 months')->format('Y-m-d');

     // توليد الفترة بين 10 و90 يومًا
     $period = rand(10, 90);

     return [
         'location_id' => Location::factory(), // توليد موقع
         'start_time' => $institutionStartTime,
         'end_time' =>  $institutionEndTime, // ضمان أن النهاية لا تتجاوز وقت المؤسسة
         'start_date' => $startDate, // تاريخ البدء
         'period' => $period, // الفترة (10 - 90 يومًا)
         'access' => fake()->numberBetween(0, 1000), // وصول عشوائي
         'type' => fake()->randomElement(['food', 'education', 'health']), // نوع الخدمة
         'title' => function (array $attributes) {
            return "خدمة ".__($attributes['type'])." ".fake()->realTextBetween(20,50).fake()->randomNumber();
           
         

    
   
    }, // عنوان فريد
         'description' => function (array $attributes) {
            switch ($attributes['type']) {
                case 'food':
                    return "تُعد هذه الخدمة من الخدمات الرائدة في مجال الطعام، حيث تسعى إلى تقديم وجبات صحية ومتنوعة تهدف إلى تلبية احتياجات المجتمع الغذائية وتحقيق تأثير إيجابي في نمط الحياة.";
                case 'education':
                    return "تُعد هذه الخدمة من الخدمات الرائدة في مجال التعليم، حيث تركز على تقديم برامج تعليمية مبتكرة تهدف إلى تطوير مهارات الأفراد والمساهمة في تحقيق التنمية المستدامة.";
                case 'health':
                    return "تُعد هذه الخدمة من الخدمات الرائدة في مجال الصحة، حيث تسعى إلى تقديم رعاية صحية عالية الجودة تساهم في تحسين صحة المجتمع والوقاية من الأمراض.";
                default:
                    return "تُعد هذه الخدمة من الخدمات المبتكرة التي تسعى إلى تحقيق تأثير إيجابي في المجتمع من خلال تقديم حلول متكاملة.";
            }
            },

    
     ];
    }
  
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */


     public function food(): static
     {
         return $this->state(fn (array $attributes) => [
             'type' => "food",
         
         ]);
     }
     public function education(): static
     {
         return $this->state(fn (array $attributes) => [
             'type' => "education",
         
         ]);
     }
     public function health(): static
     {
         return $this->state(fn (array $attributes) => [
             'type' => "health",
         
         ]);
     }
     public function contribution(): static
     {
         return $this->state(fn (array $attributes) => [
             'status' => "contribution",
         
         ]);
     }
     public function institution(): static
     {
         return $this->state(function (array $attributes, User $user) { 
             // نطاق العمل (وقت المؤسسة)
     $institutionStartTime = $user->institutionData->start_time;
     $institutionEndTime = $user->institutionData->end_time;


      
     return [
             'status' => "institution",
              'type' => $user->institutionData->type,
              'start_time' => $institutionStartTime,
              'end_time' =>  $institutionEndTime, // ضمان أن النهاية لا تتجاوز وقت المؤسسة
     ];
        
        });
     }

     public function configure()
     {
     return $this->afterMaking(function (Service $service) {
     //
     })->afterCreating(function (Service $service) {

        switch ($service->type) {
            case 'food':
          
              
                $food_service= FoodService::factory()->count(1)->make()->toArray();
                $service->foodService()->create($food_service[0]);
                $service->extensions()->createMany([

                    [
           
                        'path' =>"services/extensions/seeding/food/1.png"
                    ],
                    [
           
                        'path' =>"services/extensions/seeding/food/2.png"
                    ],
                    [
           
                        'path' =>"services/extensions/seeding/food/3.png"
                    ]
                ]);
               
       
             
                break;
            case 'education':
                $education_service= EducationService::factory()->count(1)->make()->toArray();
                $EducationSpecializations= EducationSpecialization::factory()->count(3)->make()->toArray();
                $EducationTargets= EducationTarget::factory()->count(3)->make()->toArray();
              
                $service->educationService()->create($education_service[0]);
                $service->specializations()->createMany($EducationSpecializations);
                $service->targets()->createMany($EducationTargets);
                $service->extensions()->createMany([

                    [
           
                        'path' =>"services/extensions/seeding/education/1.png"
                    ],
                    [
           
                        'path' =>"services/extensions/seeding/education/2.png"
                    ],
                    [
           
                        'path' =>"services/extensions/seeding/education/3.png"
                    ]
                ]);
             
           
                break;
            case 'health':
                $health_service= HealthService::factory()->count(1)->make()->toArray();
                $HealthFields= HealthField::factory()->count(3)->make()->toArray();
                $service->healthService()->create($health_service[0]);
                $service->fields()->createMany($HealthFields);
                $service->extensions()->createMany([

                    [
           
                        'path' =>"services/extensions/seeding/health/1.png"
                    ],
                    [
           
                        'path' =>"services/extensions/seeding/health/2.png"
                    ],
                    [
           
                        'path' =>"services/extensions/seeding/health/3.png"
                    ]
                ]);
              
              
                break;
            
           
        }

        
  
     });
     }
  



}
