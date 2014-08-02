<?php
App::uses('AppController', 'Controller');
/**
 * Recipes Controller
 *
 * @property Recipe $Recipe
 * @property PaginatorComponent $Paginator
 */
class RecipesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Recipe->recursive = 0;
        $this->set('recipes', $this->Paginator->paginate());
    }

    public function findByBase($baseId) {
            $this->Recipe->recursive = 0;
            $this->set('recipes', $this->Paginator->paginate('Recipe', array('Recipe.base_type_id' => $baseId)));
            $this->render('index');
    }

    public function findByCourse($courseId) {
            $this->Recipe->recursive = 0;
            $this->set('recipes', $this->Paginator->paginate('Recipe', array('Recipe.course_id' => $courseId)));
            $this->render('index');
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
            if (!$this->Recipe->exists($id)) {
                    throw new NotFoundException(__('Invalid recipe'));
            }
            $options = array('conditions' => array('Recipe.' . $this->Recipe->primaryKey => $id));
            $this->set('recipe', $this->Recipe->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Recipe->create();
            if ($this->Recipe->save($this->request->data)) {
                $this->Session->setFlash(__('The recipe has been successfully saved.'), "success");
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The recipe could not be saved. Please, try again.'));
            }
        }
        $ethnicities = $this->Recipe->Ethnicity->find('list');
        $baseTypes = $this->Recipe->BaseType->find('list');
        $courses = $this->Recipe->Course->find('list');
        $preparationTimes = $this->Recipe->PreparationTime->find('list');
        $difficulties = $this->Recipe->Difficulty->find('list');
        $sources = $this->Recipe->Source->find('list');
        $users = $this->Recipe->User->find('list');
        $this->set(compact('ethnicities', 'baseTypes', 'courses', 'preparationTimes', 'difficulties', 'sources', 'users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Recipe->exists($id)) {
                throw new NotFoundException(__('Invalid recipe'));
        }
        if ($this->request->is(array('post', 'put'))) {
                if ($this->Recipe->save($this->request->data)) {
                        $this->Session->setFlash(__('The recipe has been saved.'), "success");
                        return $this->redirect(array('action' => 'index'));
                } else {
                        $this->Session->setFlash(__('The recipe could not be saved. Please, try again.'));
                }
        } else {
                $options = array('conditions' => array('Recipe.' . $this->Recipe->primaryKey => $id));
                $this->request->data = $this->Recipe->find('first', $options);
        }
        $ethnicities = $this->Recipe->Ethnicity->find('list');
        $baseTypes = $this->Recipe->BaseType->find('list');
        $courses = $this->Recipe->Course->find('list');
        $preparationTimes = $this->Recipe->PreparationTime->find('list');
        $difficulties = $this->Recipe->Difficulty->find('list');
        $sources = $this->Recipe->Source->find('list');
        $users = $this->Recipe->User->find('list');
        $this->set(compact('ethnicities', 'baseTypes', 'courses', 'preparationTimes', 'difficulties', 'sources', 'users'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Recipe->id = $id;
        if (!$this->Recipe->exists()) {
                throw new NotFoundException(__('Invalid recipe'));
        }
        if ($this->Recipe->delete()) {
                $this->Session->setFlash(__('The recipe has been deleted.'), "success");
        } else {
                $this->Session->setFlash(__('The recipe could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
