<x-mail::message>
# Verifikasi Alamat Email Anda

Halo **{{ $user->name }}**,  
Anda baru saja menambahkan alamat email ke akun Anda. Untuk memastikan bahwa email ini benar milik Anda, silakan verifikasi dengan mengklik tombol di bawah ini:

<x-mail::button :url="$verificationUrl">
Verifikasi Email
</x-mail::button>

Jika Anda tidak merasa melakukan tindakan ini, abaikan email ini atau hubungi tim kami untuk bantuan lebih lanjut.

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
