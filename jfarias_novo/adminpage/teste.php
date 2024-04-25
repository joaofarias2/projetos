                    <?php foreach ($lastNot as $noticia): ?>
                        <div class="col-md-3">
                            <div class="card" >
                                <img src="../uploads/<?php echo $noticia['noticias_imagem']; ?>" class="card-img-top" alt="imagem noticia">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $noticia['noticias_titulo']; ?></h5>
                                    <p class="card-text"><?php echo $noticia['noticias_texto']; ?></p>
                                    <button class="btn btn-primary view-notice" data-toggle="modal" data-target="#noticeModal-<?php echo $noticia['id_noticias']; ?>">View Notice</button>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="noticeModal-<?php echo $noticia['id_noticias']; ?>" tabindex="-1" role="dialog" aria-labelledby="noticeModalLabel-<?php echo $noticia['id_noticias']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="noticeModalLabel-<?php echo $noticia['id_noticias']; ?>"><?php echo $noticia['noticias_titulo']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><?php echo $noticia['noticias_texto']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $('.view-notice').click(function(){
            var noticeId = $(this).data('target').replace('#noticeModal-', ''); // Extract the notice ID from data-target
            // Perform AJAX request to fetch the notice content by ID and display it in the modal
            // Example AJAX request:
            // $.ajax({
            //     url: 'get_notice.php',
            //     method: 'post',
            //     data: {id: noticeId},
            //     success: function(response){
            //         $('#noticeModalContent').html(response);
            //     }
            // });
        });
    });
</script>

</body>
</html>
