<input name="DatePreffered" type="datetime-local" class="form-control" id="DatePreffered" value="<?= date('Y-m-d H:i') ?>" required />
<script>
    function getCurrentDateTime() {
        const now = new Date();
        const year = now.getFullYear();
        const month = (now.getMonth() + 1).toString().padStart(2, '0');
        const day = now.getDate().toString().padStart(2, '0');
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');

        return `${year}-${month}-${day}T${hours}:${minutes}:${seconds}`;
    }

    // Set the initial value of the datetime input
    const datetimeInput = document.getElementById('DatePreffered');
    datetimeInput.value = getCurrentDateTime();
</script>