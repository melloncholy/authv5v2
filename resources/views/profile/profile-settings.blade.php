<x-guest-layout>
<form method="POST" action="{{ route('change.profile') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="photo">Ваше фото:</label>
        <input type="file" id="photo" name="photo" class="form-control">
    </div>
    <div class="form-group">
        <label for="nickname">Ваше отоброжаемое имя:</label>
        <input type="text" id="nickname" name="nickname" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Ваше настоящее имя:</label>
        <input type="text" id="name" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="phone">Ваш номер телефона:</label>
        <input type="text" id="phone_number" name="phone_number" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
</x-guest-layout>

