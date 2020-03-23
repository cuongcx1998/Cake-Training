<!-- File: templates/Articles/index.php  (delete links added) -->
<div class="container">
    <h1>Articles</h1>
    <a href=<?= \Cake\Routing\Router::url(['_name' => 'articles.add'])?>> <button class="btn btn-primary">Add Article</button></a>
    <table class="table table-hover">
       <thead>
           <tr>
               <th>Title</th>
               <th>Created</th>
               <th>Action</th>
           </tr>
       </thead>

        <!-- Here's where we iterate through our $articles query object, printing out article info -->

        <tbody>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td>
                    <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
                </td>
                <td>
                    <?= $article->created->format(DATE_RFC850) ?>
                </td>
                <td>
                    <button class="btn btn-warning"><?= $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?></button>
                    <button class="btn btn-danger">
                        <?= $this->Form->postLink(
                            'Delete',
                            ['action' => 'delete', $article->slug],
                            ['confirm' => 'Are you sure?'])
                        ?>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>
</div>
