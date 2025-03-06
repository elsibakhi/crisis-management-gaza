<div class="page">

    @foreach ($messages->reverse() as $message)
        
    @if ($message->sender_id==auth()->id())
         <x-chat.me-message :message="$message" :user="auth()->user()" />
    @else
          <x-chat.other-message :message="$message" :user="$user"   />
    @endif

    @endforeach
  </div>