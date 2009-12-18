<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2009, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace lithium\tests\mocks\action;

class MockPostsController extends \lithium\action\Controller {

	public $stopped = false;

	public function index($test = false) {
		if ($test) {
			return array('foo' => 'bar');
		}
		return 'List of posts';
	}

	public function delete($id = null) {
		if (empty($id)) {
			return $this->redirect('/posts', array('exit' => false));
		}
		return "Deleted {$id}";
	}

	public function send() {
		$this->redirect('/posts');
	}

	public function view($id = null) {
		if (!empty($id)) {
			// throw new NotFoundException();
		}
		$this->render(array('text', 'data' => 'This is a post'));
	}

	public function view2($id = null) {
		$this->render('view');
	}

	public function view3($id = null) {
		$this->render(array('layout' => false, 'template' => 'view'));
	}

	protected function _safe() {
		throw new Exception('Something wrong happened');
	}

	public function access($var) {
		return $this->{$var};
	}

	protected function _stop() {
		$this->stopped = true;
	}
}

?>