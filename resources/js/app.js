import './bootstrap';
import DataTable from 'datatables.net-bs5';
document.addEventListener("DOMContentLoaded", function () {
    $('#example').DataTable({
        paging: true,
        searching: true,
        lengthChange: false,
        pageLength: 10,
        language: {
            search: "ค้นหา:",  // การตั้งค่าข้อความค้นหาเป็นภาษาไทย
            paginate: {
                next: 'ถัดไป',
                previous: 'ก่อนหน้า',
            },
            lengthMenu: "แสดง _MENU_ รายการ", // การตั้งค่าข้อความเลือกจำนวนรายการที่แสดง
            info: "แสดงจาก _START_ ถึง _END_ ของ _TOTAL_ รายการ", // ข้อความแสดงข้อมูล
            zeroRecords: "ไม่พบข้อมูลที่ค้นหา", // ข้อความแสดงเมื่อไม่พบข้อมูล
        }
    });
});
