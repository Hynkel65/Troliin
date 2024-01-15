function confirmDelete(itemId, itemType) {
    var confirmDelete = confirm("Are you sure you want to delete this " + itemType + "?");
    if (confirmDelete) {
        window.location.href = itemType + 's.php?delete=' + itemId;
    }
}

function showToast(message, position, type) {
    const toast = document.getElementById("toast");
    toast.className = toast.className + " show";

    if (message) toast.innerText = message;

    if (position !== "") toast.className = toast.className + ` ${position}`;
    if (type !== "") toast.className = toast.className + ` ${type}`;

    setTimeout(function () {
        toast.className = toast.className.replace(" show", "");
    }, 3000);
}