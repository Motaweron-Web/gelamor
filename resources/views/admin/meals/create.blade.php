
<div class="modal-body">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{ route('meals.store')}}" >
        @csrf
        <div class="form-group">
            <label for="name" class="form-control-label">صورة</label>
            <input type="file" class="dropify" name="img" data-default-file="{{asset('assets/uploads/avatar.png')}}" accept="image/png,image/webp , image/gif, image/jpeg,image/jpg"/>
            <span class="form-text text-danger text-center">مسموح فقط بالصيغ التالية : png, gif, jpeg, jpg,webp</span>
        </div>
        <div class="form-group">
            <label for="name" class="form-control-label">الاسم</label>
            <input type="text" class="form-control" name="type" id="name">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-modal">اغلاق</button>
            <button type="submit" class="btn btn-primary" id="addButton">اضافة</button>
        </div>


    </form>
</div>

<script>
    $('.dropify').dropify()
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</script>
