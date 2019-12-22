yii2-simply
============

This extension is a simplification of HTML helper Yii Framework 2.0.

### Html Class

This class extends the [Yii Html Helper](https://github.com/yiisoft/yii2/blob/master/framework/helpers/Html.php) . The helper functions available in this class are:
- Html::bebin{anyTag}([\'whithot class as key\']),
- Html::end{anyTag}()
- Html::{anyTag}('content', [\'whithot class as key\'])

### As

```php
<?=\xandrkat\simply\Html::beginDiv(['container']).'any text'.\xandrkat\simply\Html::endDiv()?>
// result <div class="container">any text</div>
```

```php
<?=\xandrkat\simply\Html::beginDiv(['class' => 'container']).'any text'.\xandrkat\simply\Html::endDiv()?>
// result <div class="container">any text</div> 
```

```php
<?=\xandrkat\simply\Html::beginDiv(['container', 'class' => 'bg-primary']).'any text'.\xandrkat\simply\Html::endDiv()?>
// result <div class="container bg-primary">any text</div> 
```

```php
// or simple tag
<?=\xandrkat\simply\Html::p('any content', ['text-center'])?>
// result <p class="text-center">any content</p>
```

```php
<?=\xandrkat\simply\Html::p('any content', ['class' => 'text-center'])?>
// result <p class="text-center">any content</p>
```

```php
<?=\xandrkat\simply\Html::p('any content', ['text-success', 'class' => 'text-center'])?>
// result <p class="text-success text-center">any content</p>
```

### Or

```php
use xandrkat\simply;

<?=Html::beginDiv(['container']).'any text'.Html::endDiv()?>
// result <div class="container">any text</div>
```

```php
<?=Html::beginDiv(['class' => 'container']).'any text'.Html::endDiv()?>
// result <div class="container">any text</div> 
```

```php
<?=Html::beginDiv(['container', 'class' => 'bg-primary']).'any text'.Html::endDiv()?>
// result <div class="container bg-primary">any text</div> 
```

```php
// or simple tag
<?=Html::p('any content', ['text-center'])?>
// result <p class="text-center">any content</p>
```

```php
<?=Html::p('any content', ['class' => 'text-center'])?>
// result <p class="text-center">any content</p>
```

```php
<?=Html::p('any content', ['text-success', 'class' => 'text-center'])?>
// result <p class="text-success text-center">any content</p>
```

### Attention
Html::a(), Html::img() etc. inherits yii\helpers\Html

## License

**yii2-helpers-simplyHtml** is released under the BSD-3-Clause License. See the bundled `LICENSE.md` for details.
