<?php
  $frontpage = get_page_by_title('frontpage');
  $reviews = get_field('promo_modal', $frontpage);
?>
<style>
.modal-content {
  text-align: center;
  color: white;
  background-color: rgb(63, 97, 108);
}
.modal-header {
  border-bottom: none;
}
.modal-header>button {
  color: white;
}
.modal-header>button:hover {
  color: white;
}
.modal-footer {
  border-top: none;
}
h1 {
  font-family: "Roboto Slab", serif;
}
.btn-secondary {
  padding: 10px 20px;
  border: 3px solid white;
  border-radius: 5px;
  font-family: "Roboto", sans-serif;;
  text-transform: uppercase;
  font-size: 0.8em;
  font-weight: 700;
  cursor: pointer;
  display: inline-block;
  color: white;
  background-color: transparent;
  margin: auto;
}
.btn-secondary:hover{
  background-color: white;
  color: rgb(63, 97, 108);
  text-decoration: none;
}

</style>

<div id="promo-modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1>Closed until April 9</h1>
        <p>Due to COVID-19, Wild SF tours are temporarily postponed.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Visit Site</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function pageSet() {
    $('#promo-modal').modal('show');
  }
  window.onload = pageSet();
</script>
