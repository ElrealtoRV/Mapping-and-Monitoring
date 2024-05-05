<script>
  document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook('message.processed', (component) => {
      setTimeout(function() {
        $('#alert').fadeOut('fast');
      }, 5000);
    });
  });

  window.livewire.on('closeBranchModal', () => {
    $('#branchModal').modal('hide');
  });

  window.livewire.on('openBranchModal', () => {
    $('#branchModal').modal('show');
  });
</script>