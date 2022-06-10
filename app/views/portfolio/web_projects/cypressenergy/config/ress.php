
<ul class="pagination">
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
    <a id="liners" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><i class="mdi mdi-chevron-right"></i></a>
    </li>
    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
    <a id="liners" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><i class="mdi mdi-chevron-left"></i></a>
    </li>
</ul>



