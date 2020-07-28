<?php

include __DIR__.'/../_partials/header.php';
?>
<h3>Select Trello board</h3>

<pre>
// src/actions/mappings/boards.php

use Helpers\TrelloApi;

$boards = TrelloApi::getBoards();
</pre>

<table>
    <tbody>
        <?php foreach ($boards as $board) { ?>
        <tr>
            <td>
                <a href="/mappings/pipelines?board_id=<?php echo $board->id; ?>"><?php echo $board->name; ?></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php
include __DIR__.'/../_partials/footer.php';
?>
