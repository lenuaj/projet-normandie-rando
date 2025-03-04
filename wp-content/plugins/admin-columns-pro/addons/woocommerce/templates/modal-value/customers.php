<table class="ac-table-items -clean -customers">
	<thead>
	<tr>
		<th class="col-user">
            <?= __('Customer', 'lenuaj-admin-columns') ?>
		</th>
		<th class="col-date">
            <?= __('Recent Order', 'lenuaj-admin-columns') ?>
		</th>
		<th class="col-orders">
            <?= __('Orders', 'lenuaj-admin-columns') ?>
		</th>
	</tr>
	</thead>
	<tbody>
    <?php
    foreach ($this->items as $item) : ?>
		<tr>
			<td class="col-name">
                <?= $item['name'] ?>
			</td>
			<td class="col-date">
                <?= $item['recent_order'] ?>
			</td>
			<td class="col-orders">
                <?= $item['orders'] ?>
			</td>
		</tr>
    <?php
    endforeach; ?>
	</tbody>
</table>