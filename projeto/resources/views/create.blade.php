<div id="create" class="modal">
    <div class="modal-content">
        <form action="{{ route('form.create.event') }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s6">
                    <input name="title" type="text" id="title">
                    <label for="name">Título</label>
                </div>
                <div class="input-field col s6">
                    <input name="description" type="text" id="description">
                    <label for="description">Descrição</label>
                </div>
                <div class="input-field col s6">
                    <input name="init_date" type="date" id="init_date">
                    <label for="init_date">Data de início</label>
                </div>
                <div class="input-field col s6">
                    <input name="end_date" type="date" id="end_date">
                    <label for="end_date">Data de término</label>
                </div>
                <div class="input-field col s6">
                    <input name="max_participants" type="text" id="max_participants">
                    <label for="max_participants">Número máximo de participantes</label>
                </div>
                <div class="input-field col s6">
                    <input name="entry_price" type="number" id="entry_price">
                    <label for="entry_price">Valor da entrada</label>
                </div>
                <div class="input-field col s6">
                    <input name="event_image" type="file" id="event_image">
                    <label for="event_image">Imagem do evento</label>
                </div>
            </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Criar evento</button>
        </form>
    </div>
</div>
