<table>
	<tr><td colspan="2"><h4>THỐNG KÊ TRUY CẬP</h4></td></tr>
	<tr style="text-align:right;">
		<td>Đang Truy Cập : </td>
		<td><?=$this->tkt_online->get_online()?></td>
	</tr>
	<tr style="text-align:right;">
		<td>Hôm Nay: </td>
		<td><?=$this->tkt_online->get_today()?></td>
	</tr>
	<tr style="text-align:right;">
		<td>Hôm Qua: </td>
		<td><?=$this->tkt_online->get_yesterday()?></td>
	</tr>
	<tr style="text-align:right;">
		<td>Tháng Này: </td>
		<td><?=$this->tkt_online->get_thismonth()?></td>
	</tr>
	<tr style="text-align:right;">
		<td>Tháng Trước: </td>
		<td><?=$this->tkt_online->get_premonth()?></td>
	</tr>
	<tr style="text-align:right;">
		<td>Tổng Lượt Truy Cập: </td>
		<td><?=$this->tkt_online->get_total()?></td>
	</tr>
	<tr style="text-align:right;">
		<td>bot/spider online: </td>
		<td><?=$this->tkt_online->get_bot_online()?></td>
	</tr>
	<tr style="text-align:right;">
		<td>total bot: </td>
		<td><?=$this->tkt_online->get_bot()?></td>
	</tr>
</table>