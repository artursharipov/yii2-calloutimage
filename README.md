* Выполнить миграцию:
```
yii migrate --migrationPath=@common/modules/calloutimage/migrations --interactive=0

```


```

<?= \common\modules\calloutImage\widgets\CalloutAdminWidget::widget([
    'src' => '/img/2.jpg',
    'viewbox' => '0 0 300 200',
    'width' => '100',
]) ?>

```