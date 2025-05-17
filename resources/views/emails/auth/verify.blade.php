<x-mail::message>
# Verifikasi Email Anda

Halo **{{ $user->name }}**,  
Terima kasih telah mendaftar. Untuk menyelesaikan pendaftaran, silakan verifikasi email Anda dengan mengklik tombol di bawah ini:

<x-mail::button :url="$verificationUrl">
Verifikasi Email
</x-mail::button>

Jika Anda tidak merasa mendaftar, abaikan email ini.

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
