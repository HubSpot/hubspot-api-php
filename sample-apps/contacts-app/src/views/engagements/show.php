<?php include __DIR__.'/../_partials/header.php'; ?>

<?php if (isset($errorResponse)) {
    include __DIR__.'/../_partials/error_response.php';
} ?>

<div class="row">
    <div class="column column-50">
        <form method="post" action="/engagements/show.php">
            <fieldset>
                <label for="type">Type</label>
                <select name="engagement[type]" id="type">
                    <option value="MEETING">Meeting</option>
                </select>
                <label for="title">Title</label>
                <input type="text" name="metadata[title]" id="title" />
                <label for="body">Body</label>
                <textarea name="metadata[body]" id="body"></textarea>
                <label for="startTime">Start time</label>
                <input type="datetime-local" id="startTime" name="metadata[startTime]" />
                <label for="endTime">End time</label>
                <input type="datetime-local" id="endTime" name="metadata[endTime]" />
                <input type="hidden" name="associations[contactIds][]" value="<?php echo htmlentities($contactId); ?>" />
                <input id="save" class="button-primary" type="submit" value="Save">
            </fieldset>
        </form>
    </div>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
