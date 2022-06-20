<?php
if (!empty($_GET['link'])) {
	$link = $_GET['link'];
} else {
	$link = "home";
}

switch ($link) {
	case 'home':
		include("modul/home.php");
		break;

	case 'data_problem':
		if ($_SESSION['level_pro'] <= 2) {
			include("modul/data_problem.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'form_data_problem':
		if ($_SESSION['level_pro'] <= 2) {
			include("modul/form_data_problem.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'detail_problem':
		if ($_SESSION['level_pro'] <= 2) {
			include("modul/detail_data_problem.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'rekap_data_problem':
		if ($_SESSION['level_pro'] <= 2) {
			include("modul/rekap_data_problem.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'data_failover':
		if ($_SESSION['level_pro'] <= 3) {
			include("modul/data_failover.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'form_failover':
		if ($_SESSION['level_pro'] <= 2) {
			include("modul/form_data_failover.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'detail_failover':
		if ($_SESSION['level_pro'] <= 3) {
			include("modul/detail_data_failover.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'rekap_data_failover':
		if ($_SESSION['level_pro'] <= 3) {
			include("modul/rekap_data_failover.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'form_overhandle':
		if ($_SESSION['level_pro'] <= 2) {
			include("modul/form_data_overhandle.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'data_overhandle':
		if ($_SESSION['level_pro'] <= 2) {
			include("modul/data_overhandle.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'detail_overhandle':
		if ($_SESSION['level_pro'] <= 2) {
			include("modul/detail_data_overhandle_2.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'rekap_data_overhandle':
		if ($_SESSION['level_pro'] <= 2) {
			include("modul/rekap_data_overhandle.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'data_projectQE':
		if ($_SESSION['level_pro'] <= 3) {
			include("modul/data_project_qe.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'form_projectQE':
		if ($_SESSION['level_pro'] <= 2) {
			include("modul/form_projectQE.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'detail_projectQE':
		if ($_SESSION['level_pro'] <= 3) {
			include("modul/detail_data_projectQE.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'form_topologiQE':
		if ($_SESSION['level_pro'] <= 2) {
			include("modul/form_topologi.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'rekap_projectQE':
		if ($_SESSION['level_pro'] <= 3) {
			include("modul/rekap_data_project.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'data_inventory':
		include("modul/data_inventory.php");
		break;

	case 'form_inventory':
		if ($_SESSION['level_pro'] <= 2) {
			include("modul/form_inventory.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'detail_inventory':
		include("modul/detail_inventory.php");
		break;

	case 'rekap_inventory':
		if ($_SESSION['level_pro'] <= 3) {
			include("modul/rekap_data_inventory.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'import_inventory':
		if ($_SESSION['level_pro'] <= 1) {
			include("modul/excel_import_inventory.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'import_failover':
		if ($_SESSION['level_pro'] <= 1) {
			include("modul/import_failover.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'data_prime':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/data_prime.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'sinkronisasi_prime':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/sinkroning_prime.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'detail_project':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/detail_project.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'form_edit_project':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/form_edit_project.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'data_user':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 1) {
			include("modul/data_user.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'detail_user':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 1) {
			include("modul/detail_user.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'daftar_user':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 1) {
			include("modul/form_input_user.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'edit_user':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 1) {
			include("modul/form_edit_user.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'reset_password':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 1) {
			include("modul/reset_password.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'segment_konfig':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 1) {
			include("modul/segment_konfig.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'data_inventory_des':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/data_inventory_des.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'data_inventory_dgs':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/data_inventory_dgs.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'data_inventory_dbs':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/data_inventory_dbs.php");
		} else {
			include("modul/otoritas.php");
		}
		break;
	case 'data_kontrak_expired':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/data_kontrak_expired.php");
		} else {
			include("modul/otoritas.php");
		}
		break;
	case 'data_manage_service':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/data_manage_service.php");
		} else {
			include("modul/otoritas.php");
		}
		break;
	case 'data_nonmanage_service':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/data_nonmanage_service.php");
		} else {
			include("modul/otoritas.php");
		}
		break;
	case 'data_inventori_strategis':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/data_inventori_strategis.php");
		} else {
			include("modul/otoritas.php");
		}
		break;
	case 'data_inventori_nonstrategis':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/data_inventori_nonstrategis.php");
		} else {
			include("modul/otoritas.php");
		}
		break;
	case 'data_pemenuhan_eos':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/data_pemenuhan_eos.php");
		} else {
			include("modul/otoritas.php");
		}
		break;
	case 'data_pemenuhan_eos':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/data_pemenuhan_eos.php");
		} else {
			include("modul/otoritas.php");
		}
		break;
	case 'data_eos_request_on_review':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/data_eos_reqonreview.php");
		} else {
			include("modul/otoritas.php");
		}
		break;
	case 'data_eos_rejected':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/data_eos_rejected.php");
		} else {
			include("modul/otoritas.php");
		}
		break;
	case 'data_eos_accepted':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/data_eos_accepted.php");
		} else {
			include("modul/otoritas.php");
		}
		break;
	case 'form_pemenuhan_eos':
		if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 2) {
			include("modul/form_pemenuhan_oes.php");
		} else {
			include("modul/otoritas.php");
		}
		break;

	case 'detail_pemenuhan_eos':
		include("modul/detail_pemenuhan_eos.php");
		break;

	default:
		include("modul/page_not_found.php");
		break;
}
