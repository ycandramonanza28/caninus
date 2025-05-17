<x-mail::message>
# Informasi Akun Anda

Halo **{{ $user->name }}**,  
Selamat datang di **Caninus**!

Akun Anda telah berhasil dibuat. Berikut adalah informasi login awal Anda:

- **Username:** {{ $user->email }}  
- **Password Default:** {{ $pass }}  

<x-mail::button :url="$loginUrl">
Login ke Caninus
</x-mail::button>

Demi keamanan, harap segera login dan ganti password Anda.

Jika Anda tidak merasa mendaftar, abaikan email ini atau hubungi tim support kami di support@caninus.id.

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
