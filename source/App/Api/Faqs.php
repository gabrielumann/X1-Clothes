<?php

namespace Source\App\Api;


use Source\Models\Faq\Question;
use Source\Models\Faq\Type;

class Faqs extends Api
{
    private static string $CLASSNAME = "FAQ";
    public function __construct()
    {
        parent::__construct();
    }
    public function listFaqs()
    {
        $faqs = (new Question())->find()->fetch(true);

        $response = [];
        foreach ($faqs as $faq) {

            $response[] = $faq->data();
        }

        $this->success($response);
    }
    public function getFaq(array $data){
        $id = $data["id"];
        //echo $id;
        $faq = (new Question())->findById($id);
        if (!$faq) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
            return;
        }
        $response[] = $faq->data();
        $this->success($response);
    }
    public function createFaq(array $data){

        $faq = new Question();

        $requiredFields = ["question", "answer", "category_id"];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                $this->error(message: "Está faltando o campo '$field'");
                die();
            }
        }
        $faq->question = $data["question"];
        $faq->answer = $data["answer"];
        $faq->category_id = $data["category_id"];
        $faq->save();

        $response[] = $faq->data();

        $this->success($response ,message: "Faq criada com sucesso!");
    }
    public function updateFaq(array $data){
        $id = $data["id"];

        $instance = new Question();
        $faq = $instance->findById($id);
        if (!$faq) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
            return;
        }

        if (isset($data["question"])) {
            $faq->question = $data["question"];
        }
        if (isset($data["answer"])) {
            $faq->answer = $data["answer"];
        }
        if (isset($data["category_id"])) {
            $faq->category_id = $data["category_id"];
        }

        if($faq->save()){
            $response[] = $faq->data();
            $this->success($response, message: "Faq atualizada com sucesso!");
        };
    }
    public function deleteFaq(array $data){
        //$this->auth();

        $id = $data["id"];
        $faq = (new Question())->findById($id);

        if ($faq) {
            $faq->destroy();
            $this->success(message: "Faq do id: $id foi removida com sucesso!");
        } else {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
        }
    }

    // FAQ Categories
    public function listFaqCategories()
    {
        $faqs = (new Type())->find()->fetch(true);

        $response = [];
        foreach ($faqs as $faq) {

            $response[] = $faq->data();
        }

        $this->success($response);
    }
    public function getFaqCategories(array $data){

        $id = $data["id"];
        $faqCategory = (new Type())->findById($id);
        if (!$faqCategory) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
            return;
        }
        $response[] = $faqCategory->data();
        $this->success($response);
    }
    public function createFaqCategories(array $data){
        //$this->auth();

        $faqCategory = new Type();

        if (!isset($data["description"])) {
            $this->error(message: "Está faltando o campo 'description'");
            die();
        }


        $faqCategory->description = $data["description"];

        if (!$faqCategory->createType()) {
            $this->error(message: $faqCategory->getMessage());
            return;
        }

        $response[] = $faqCategory->data();
        $this->success($response ,message: "Categoria criada com sucesso!");
    }
    public function updateFaqCategories(array $data){
        $id = $data["id"];

        $instance = new Type();
        $faqCategory = $instance->findById($id);
        if (!$faqCategory) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
            return;
        }

        if (!isset($data["description"])) {
            $this->error(message: "Está faltando o campo 'description'");
            die();
        }

        $faqCategory->description = $data["description"];
        if($faqCategory->save()){
            $response[] = $faqCategory->data();
            $this->success($response, message: "Faq atualizada com sucesso!");
        };
    }
    public function deleteFaqCategories(array $data){
        $id = $data["id"];
        $category = (new Type())->findById($id);

        if ($category) {
            $category->destroy();
            $this->success(message: "FAQ do id: $id foi removida com sucesso!");
        } else {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
        }
    }
}