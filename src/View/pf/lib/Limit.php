<?php 
/*
 * Copyright (C) 2004-2016 Soner Tari
 *
 * This file is part of PFFW.
 *
 * PFFW is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * PFFW is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with PFFW.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace View;

class Limit extends Rule
{
	function display($ruleNumber, $count)
	{
		$this->dispHead($ruleNumber);
		$this->dispLimit();
		$this->dispTail($ruleNumber, $count);
	}
	
	function dispLimit()
	{
		?>
		<td title="<?php echo _TITLE('Limit') ?>" colspan="12">
			<?php
			$this->arr= array();
			if (count($this->rule['limit'])) {
				reset($this->rule['limit']);
				while (list($key, $val)= each($this->rule['limit'])) {
					$this->arr[]= "$key: $val";
				}
			}
			echo implode(', ', $this->arr);
			?>
		</td>
		<?php
	}

	function input()
	{
		$this->inputKey('states', 'limit');
		$this->inputKey('frags', 'limit');
		$this->inputKey('src-nodes', 'limit');
		$this->inputKey('tables', 'limit');
		$this->inputKey('table-entries', 'limit');

		$this->inputKey('comment');
		$this->inputDelEmpty();
	}

	function edit($ruleNumber, $modified, $testResult, $generateResult, $action)
	{
		$this->editIndex= 0;
		$this->ruleNumber= $ruleNumber;

		$this->editHead($modified);

		$this->editLimit();

		$this->editComment();
		$this->editTail($modified, $testResult, $generateResult, $action);
	}

	function editLimit()
	{
		?>
		<tr class="<?php echo ($this->editIndex++ % 2 ? 'evenline' : 'oddline'); ?>">
			<td class="title">
				<?php echo _TITLE('States').':' ?>
			</td>
			<td>
				<input type="text" size="10" id="states" name="states" value="<?php echo $this->rule['limit']['states']; ?>" placeholder="<?php echo _CONTROL('number') ?>" />
				<?php $this->editHelp('states') ?>
			</td>
		</tr>
		<tr class="<?php echo ($this->editIndex++ % 2 ? 'evenline' : 'oddline'); ?>">
			<td class="title">
				<?php echo _TITLE('Frags').':' ?>
			</td>
			<td>
				<input type="text" size="10" id="frags" name="frags" value="<?php echo $this->rule['limit']['frags']; ?>" placeholder="<?php echo _CONTROL('number') ?>" />
				<?php $this->editHelp('frags') ?>
			</td>
		</tr>
		<tr class="<?php echo ($this->editIndex++ % 2 ? 'evenline' : 'oddline'); ?>">
			<td class="title">
				<?php echo _TITLE('Src Nodes').':' ?>
			</td>
			<td>
				<input type="text" size="10" id="srcnodes" name="src-nodes" value="<?php echo $this->rule['limit']['src-nodes']; ?>" placeholder="<?php echo _CONTROL('number') ?>" />
				<?php $this->editHelp('src-nodes') ?>
			</td>
		</tr>
		<tr class="<?php echo ($this->editIndex++ % 2 ? 'evenline' : 'oddline'); ?>">
			<td class="title">
				<?php echo _TITLE('Tables').':' ?>
			</td>
			<td>
				<input type="text" size="10" id="tables" name="tables" value="<?php echo $this->rule['limit']['tables']; ?>" placeholder="<?php echo _CONTROL('number') ?>" />
				<?php $this->editHelp('tables') ?>
			</td>
		</tr>
		<tr class="<?php echo ($this->editIndex++ % 2 ? 'evenline' : 'oddline'); ?>">
			<td class="title">
				<?php echo _TITLE('Table Entries').':' ?>
			</td>
			<td>
				<input type="text" size="10" id="table-entries" name="table-entries" value="<?php echo $this->rule['limit']['table-entries']; ?>" placeholder="<?php echo _CONTROL('number') ?>" />
				<?php $this->editHelp('table-entries') ?>
			</td>
		</tr>
		<?php
	}
}
?>