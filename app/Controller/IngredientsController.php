<?php
App::uses('AppController', 'Controller');
/**
 * Ingredients Controller
 *
 * @property Ingredient $Ingredient
 * @property PaginatorComponent $Paginator
 */
class IngredientsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'RequestHandler');
    
    public $paginate = array(
        'order' => array(
            'Ingredient.name' => 'asc'
        )
    );

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Ingredient->recursive = 0;
        $this->Paginator->settings = $this->paginate;
        $this->set('ingredients', $this->Paginator->paginate());
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if ($id != null && !$this->Ingredient->exists($id)) {
                throw new NotFoundException(__('Invalid ingredient'));
        }

        if ($this->request->is(array('post', 'put'))) {
                if ($this->Ingredient->save($this->request->data)) {
                        $this->Session->setFlash(__('The ingredient has been saved.'), 'success', array('event' => 'savedIngredient'));
                        return $this->redirect(array('action' => 'edit'));
                } else {
                        $this->Session->setFlash(__('The ingredient could not be saved. Please, try again.'));
                }
        } else if ($id != null) {
                $options = array('conditions' => array('Ingredient.' . $this->Ingredient->primaryKey => $id));
                $this->request->data = $this->Ingredient->find('first', $options);
        }
        $coreIngredients = $this->Ingredient->CoreIngredient->find('list');
        $locations = $this->Ingredient->Location->find('list');
        $units = $this->Ingredient->Unit->find('list');
        $users = $this->Ingredient->User->find('list');
        $this->set(compact('coreIngredients', 'locations', 'units', 'users'));
    }

    public function delete($id = null) {
        $this->Ingredient->id = $id;
        if (!$this->Ingredient->exists()) {
                throw new NotFoundException(__('Invalid ingredient'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Ingredient->delete()) {
                $this->Session->setFlash(__('The ingredient has been deleted.'), 'success');
        } else {
                $this->Session->setFlash(__('The ingredient could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
     
    public function search() {
        $term = $this->request->query('term');
        if ($term)
        {
            $this->Ingredient->recursive = 0;
            $this->Paginator->settings = $this->paginate;
            $this->set('ingredients', $this->Paginator->paginate("Ingredient", array('Ingredient.Name LIKE' => '%' . $term . '%')));
        } else {
            $this->set('ingredients', $this->Paginator->paginate());
        }
        $this->render('index');
    }
    
    public function autoCompleteSearch() {
        $searchResults = array();
        $term = $this->request->query('term');
        if ($term)
        {
            $ingredients = $this->Ingredient->find('all', array(
              'conditions' => array('Ingredient.name LIKE ' => '%' . trim($term) . '%')
            ));
            
            if (count($ingredients) > 0) {
                foreach ($ingredients as $item) {
                    $key = $item['Ingredient']['name'];
                    $value = $item['Ingredient']['id'];
                    array_push($searchResults, array("id"=>$value, "value" => strip_tags($key)));
                }
            } else {
                $key = "No Results for ' . $term . ' Found";
                array_push($searchResults, array("id"=>$value, "value" => ""));
            }
            
            $this->set(compact('searchResults'));
            $this->set('_serialize', 'searchResults');
        }
    }
}
