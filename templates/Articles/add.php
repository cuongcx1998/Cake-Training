<!-- File: templates/Articles/add.php -->

<h1>Add Article</h1>
<?php
echo $this->Form->create($article);
// Hard code the user for now.
echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
echo $this->Form->control('title');
echo $this->Form->control('body', ['rows' => '3']);
echo $this->Form->control('tag_string', ['type' => 'text']);
echo $this->Form->button(__('Save Article'));
echo $this->Form->end();
?>
<form action="/action_page.php">
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" placeholder="Enter email" id="email">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" placeholder="Enter password" id="pwd">
    </div>
    <div class="form-group form-check">x
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox"> Remember me
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
