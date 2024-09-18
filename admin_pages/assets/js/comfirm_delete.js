<script>
function confirmDelete() {
  if (confirm("Are you sure you want to delete this item?")) {
    // User clicked OK, so perform the delete action
    deleteItem();
  } else {
    // User clicked Cancel, so do nothing
  }
}

function deleteItem() {
  // Code to delete the item goes here
}
</script>