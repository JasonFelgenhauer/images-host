<?php $this->_t = 'Host' ?>
<section id="host">
    <h2>Host your image</h2>
    <div class="container host">
        <form action="/host" method="post" enctype="multipart/form-data">
            <div>
                <input type="file" name="file_input" id="file_input" class="f">
                <label for="file_input">Upload picture</label>
            </div>
            <div>
                <input type="submit" value="Host">
            </div>
        </form>
    </div>
</section>
