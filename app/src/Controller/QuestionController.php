<?php
namespace App\Controller;

use App\Library\Question;
use App\Library\QuestionList;
use App\Service\Entity\QuestionListService;
use App\Service\Parser\ParserFactory;
use App\Service\Normalizer\QuestionNormalizer;
use FOS\RestBundle\Controller\Annotations as FOS;
use FOS\RestBundle\Request\ParamFetcher;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class QuestionController extends AbstractController
{
    /**
     * Returns the list of translated questions and associated choices and associated choices
     *
     * @Route("/questions", name="list_questions", methods={"GET"})
     *
     * @FOS\QueryParam(name="lang", requirements="^[a-z]{2}$", nullable=false, allowBlank=false, strict=true)
     */
    public function listAction(ParamFetcher $paramFetcher, ParserFactory $parserFactory, QuestionListService $questionListService, SerializerInterface $serializer)
    {
        $lang = $paramFetcher->get('lang');
        $parser = $parserFactory->getParser();

        $questionsList = $parser->parse();
        $questionListService->translate($questionsList, $lang);

        return new JsonResponse(
            $serializer->serialize($questionsList, 'json'),
            200,
            [],
            true
        );
    }

    /**
     * Creates a new question and associated choices (the number of associated choices must
     * be exactly equal to 3)
     *
     * @Route("/questions", name="create_questions", methods={"POST"})
     *
     */
    public function createAction(Request $request, QuestionNormalizer $questionNormalizer, SerializerInterface $serializer)
    {
        $data = $request->request->all();
        $question = $questionNormalizer->normalize($data);

        return new JsonResponse(
            $serializer->serialize($question, 'json'),
            200,
            [],
            true
        );
    }
}
