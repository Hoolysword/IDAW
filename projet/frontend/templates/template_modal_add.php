<!-- Logout Modal-->
<script> 
    var nom= "<?php echo $_SESSION['nom']; ?>";
    // alert(nom);
</script>
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajoutez votre truc</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <input type="text" id="search" placeholder="Search...">
            <ul id="suggestions"></ul>
            <script>
                
                var array = ({
                                ajax: chemin + "/backend/aliment?nom="+nom,
                                dataSrc: '',
                                dom: 'Bfrtip',
                                columns: [
                                    { "data": "nom_alim" },
                                        ],
                            });
                
                const searchInput = document.getElementById('search');
                const suggestionsList = document.getElementById('suggestions');

                searchInput.addEventListener('input', () => {
                    const inputValue = searchInput.value.toLowerCase();
                    const suggestions = array.filter(item => item.toLowerCase().startsWith(inputValue));

                    suggestionsList.innerHTML = '';

                    if (inputValue.length > 0) {
                        suggestions.forEach(item => {
                            const li = document.createElement('li');
                            li.innerText = item;
                            suggestionsList.appendChild(li);
                        });
                    }
                });

                suggestionsList.addEventListener('click', event => {
                    if (event.target.tagName === 'LI') {
                        searchInput.value = event.target.innerText;
                        suggestionsList.innerHTML = '';
                    }
                });
            </script>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="index.php">Valider</a>
            </div>
        </div>
    </div>
</div>