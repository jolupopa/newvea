
<ul class="list-unstyled d-flex  justify-content-center">
    <li class="mr-3">
        <a href="https://twitter.com/share?url={{ request()->fullUrl() }}&text={{ $description }}"
            onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
            target="_blank" title="Compartir en Twitter"><i class="fab fa-twitter fa-2x text-info"></i>
        </a>
    </li>

    <li class="mr-3">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}&title={{  $description  }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Compartir en Facebook"><i class="fab fa-facebook fa-2x text-primary"></i>
        </a>
    </li>

    <li class="mr-3">
        <a href="http://pinterest.com/pin/create/button/?url={{ request()->fullUrl() }}&media={{ asset('img/blog/image-1.jpg')  }}" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Compartir en Pinterest"><i class="fab fa-pinterest fa-2x text-danger"></i>
        </a>
    </li>
    <li>
        <a href="whatsapp://send?text={{ $description }}" data-action="share/whatsapp/share" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Compartir en whatsapp"><i class="fab fa-whatsapp text-success fa-2x text-success"></i>
        </a>
    </li>
</ul>
