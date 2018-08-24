<br/>
<div class="text-center">
    <ul class="pagination pagination-sm" style="margin: auto">
        <?php
        echo $this->Paginator->numbers(Configure::read('settings.paginationOptions'));
        ?>
    </ul>
</div>