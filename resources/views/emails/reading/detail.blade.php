@component('mail::message')
# รายละเอียดการขอจองอ่านหนังสือ

เรียนเจ้าหน้าที่ห้องสมุด ขณะนี้ได้มีผู้จองอ่านหนังสือเข้ามาซึ่งมีรายละเอียดดังต่อไปนี้<br>

ชื่อหนังสือ: {{ $reading->book_title }}<br>
ผู้แต่ง: {{ $reading->book_author }}<br>
ผู้ขอจองอ่าน: {{ $reading->firstname . ' ' . $reading->lastname }}<br>
อีเมล์ติดต่อกลับ: <a href="mailto:{{ $reading->email }}?subject=ติดต่อจากทีมงานห้องสมุดเรื่อง {{ $reading->book_title }}ที่คุณจองอ่าน">{{ $reading->email }}</a><br>
หากต้องการจัดการกับข้อมูลสามารถเข้าไปได้ตามลิ้งก์ชื่อหนังสือด้านล่างนี้

@component('mail::button', ['url' => url("/reading/person/{$reading->id}")])
{{ $reading->book_title }}
@endcomponent

ขอบคุณ<br>
ระบบติดต่ออ่านหนังสือ ห้องสมุดคนตาบอดและผู้พิการทางสื่อสิ่งพิมพ์แห่งชาติ
@endcomponent
