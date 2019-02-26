@component('mail::message')
# รายละเอียดการขอจองอ่านหนังสือ

เรียนคุณ {{ $reading->firstname . ' ' . $reading->lastname }} <br>
รายละเอียดของหนังสือที่ต้องการอ่านมีดังนี้ <br>

คุณ {{ $reading->firstname . ' ' . $reading->lastname }} มีความประสงค์ที่จะขอจองอ่านหนังสือเรื่อง {{ $reading->book_title }} แต่งโดย {{ $reading->book_author }} <br>

หากทางทีมงานได้ดำเนินการตรวดสอบข้อมูลของท่านเป็นที่เรียบร้อยแล้ว
ทางทีมงานจะติดต่อกลับตามข้อมูลที่ท่านได้ให้ใว้
ท่านสามารถเข้าไปตรวดสอบข้อมูลการขอจองอ่านได้ตามลิ้งก์ชื่อหนังสือด้านล่างนี้ <br>

@component('mail::button', ['url' => url("/reading/person/{$reading->id}")])
{{ $reading->book_title }}
@endcomponent

ขอบคุณ<br>
ระบบติดต่ออ่านหนังสือ ห้องสมุดคนตาบอดและผู้พิการทางสื่อสิ่งพิมพ์แห่งชาติ
@endcomponent
