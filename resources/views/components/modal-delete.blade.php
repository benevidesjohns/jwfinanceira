<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border border-8 border-dark shadow-xl">
            <h5 class="modal-title bg-dark text-center" id="modalDeleteLabel">AVISO</h5>
            <div class="modal-body text-center">
                <span id="message-modal"></span>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                <form id="delete-form" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <button id="modal-ok-button" type="submit" class="btn btn-dark">OK</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js\action_reload.js') }}"></script>
