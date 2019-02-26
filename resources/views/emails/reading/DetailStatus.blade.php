@component('mail::message')
# Introduction

เรียน ทีมงานห้องสมุด<br>
ขณะนี้ได้มีการเปลี่ยนสถานะการจองอ่านหนังสือของคุณ {{ $data->firstname . ' ' . $data->lastname }}<br>
ตามรายละเอียดต่อไปนี้<br>
คุณ {{ $data->firstname . ' ' . $data->lastname }} ได้จองอ่านหนังสือเรื่อง {{ $data->book_title }}<br>
ได้ถูกเปลี่ยนสถานะใหม่เป็น {{ $data->status->name }}<br>
ดำเนินการเปลี่ยนสถานะโดยคุณ {{ Auth::user()->name }}<br>
สามารถดูรายละเอียดเพิ่มเติมได้ที่ลิ้งก์ด้านล่างนี้<br>

@component('mail::button', ['url' => url("/reading/person/{$data->id}")])
{{ $data->book_title }}
@endcomponent

จึงเรียนมาเพื่อทราบ<br>
{{ config('app.name') }}
@endcomponent
