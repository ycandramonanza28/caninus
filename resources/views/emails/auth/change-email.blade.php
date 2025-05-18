<x-mail::message>
# Verifikasi Perubahan Email Anda

Halo **{{ $user->name }}**,  
Kami menerima permintaan untuk mengubah alamat email Anda. Untuk mengonfirmasi perubahan ini, silakan verifikasi email baru Anda dengan mengklik tombol di bawah ini:

<x-mail::button :url="$verificationUrl">
Verifikasi Email Baru
</x-mail::button>

Jika Anda tidak merasa melakukan perubahan ini, abaikan email ini atau hubungi kami segera.

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
