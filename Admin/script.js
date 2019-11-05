function deleteItem(event) {
	if (!confirm("Item will be deleted permanently")) {
		event.preventDefault();
	}
}