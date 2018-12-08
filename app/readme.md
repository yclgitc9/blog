flash alert does not work when we click on author name at file index.blade.php
@if (isset($authorName))
                        <div class = "alert alert-info">
                            <p>Author: <strong> {{ $authorName }} </strong></p>                            
                        </div>
                    @endif