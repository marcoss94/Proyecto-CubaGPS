<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends Controller
{
    /**
     * @Route("/report", name="report")
     */
    public function index()
    {
        return $this->render('report/index.html.twig', [
            'controller_name' => 'ReportController',
        ]);
    }

    /**
     * @Route("/reportbase", name="reportbase")
     */
    public function base()
    {
        return $this->render('report/report_base.html.twig');
    }

    /**
     * Export to PDF
     *
     * @Route("/reportuser", name="reportuser")
     */
    public function user()
    {
        $html = $this->renderView('report/report_base.html.twig');

        $filename = sprintf('specifications-%s.pdf', date('Y-m-d-hh-ss'));

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
            ]
        );
    }
}
