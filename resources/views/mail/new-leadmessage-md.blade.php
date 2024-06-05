<x-mail::message>
    # Introduction

    Name sender: {{ $lead->name }}

    Email sender: {{ $lead->email }}

    The body of your message.

    Message: {{ $lead->message }}



    Thanks,
    {{ config('app.name') }}
</x-mail::message>
