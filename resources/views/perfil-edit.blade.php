<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Outros campos do perfil -->

    <div>
        <label for="profile_photo">Foto de Perfil</label>
        <input type="file" name="profile_photo" id="profile_photo">
    </div>

    <button type="submit">Atualizar Perfil</button>
</form>