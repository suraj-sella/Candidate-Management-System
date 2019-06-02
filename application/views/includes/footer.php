            <div class="row">
                <div class="offset-md-2 col-md-8 text-center">
                    <p class="footsection">Title Icon Made By
                        <a href="https://www.flaticon.com/authors/turkkub" title="turkkub">turkkub</a>
                        From
                        <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
                        Is Licensed By
                        <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
    <script src="<?php echo base_url('assets/script/scripts.js')?>"></script>
    <?php
        if($this->session->flashdata('flashSuccess')){
            echo "
            <script type='text/javascript'>
            var success = new Noty({
                text: '&nbsp&nbsp&nbsp<i class=" . '"fas fa-check"' . "></i>&nbsp&nbsp " . $this->session->flashdata('flashSuccess') . "',
                animation: {
                    easing: 'swing',
                    speed: 1000
                },
                closeWith: ['click'],
                type: 'success',
                modal: true,
                killer: true,
                timeout: 1000,
                theme: 'metroui'
            });
            success.show();
            </script>";
        }
        if($this->session->flashdata('flashError')){
            echo "
            <script type='text/javascript'>
            var error = new Noty({
                text: '" .$this->session->flashdata('flashError') . "',
                animation: {
                    easing: 'swing',
                    speed: 1000
                },
                closeWith: ['click'],
                type: 'error',
                modal: true,
                killer: true,
                timeout: 3000,
                theme: 'metroui'
            });
            error.show();
            </script>";
        }
    ?>
</html>