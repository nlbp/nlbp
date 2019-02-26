@component('mail::message')
# Introduction

เรียนคุณ {{ $data->firstname . ' ' . $data->lastname }}<br>
ขณะนี้ทางทีมงานห้องสมุดได้เปลี่ยนสถานะการจองอ่านหนังสือของคุณ {{ $data->firstname . ' ' . $data->lastname }}<br>
ตามรายละเอียดดังนี้<br>
หนังสือเรื่อง {{ $data->book_title }} อยู่ในสถานะ {{ $data->status->name }}<br>
คุณสามารถเข้าดูรายละเอียดเพิ่มเติมได้ตามลิ้งก์ด้านล่างนี้<br>

@component('mail::button', ['url' => url("/reading/person/{$data->id}")])
{{ $data->book_title }}
@endcomponent

จึงเรียนมาเพื่อทราบ<br>
{{ config('app.name') }}
@endcomponent
