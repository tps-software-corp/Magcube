<?php

namespace Plugin\Magcube\Controller\Admin;

use Eccube\Controller\AbstractController;
use Plugin\Magcube\Form\Type\Admin\ConfigType;
use Plugin\Magcube\Repository\ConfigRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ConfigController extends AbstractController
{
    /**
     * @var ConfigRepository
     */
    protected $configRepository;

    /**
     * ConfigController constructor.
     *
     * @param ConfigRepository $configRepository
     */
    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    /**
     * @Route("/%eccube_admin_route%/magcube/config", name="magcube_admin_config")
     * @Template("@Magcube/admin/config.twig")
     */
    public function index(Request $request)
    {
        $Config = $this->configRepository->get();
        $form = $this->createForm(ConfigType::class, $Config);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $Config = $form->getData();
            $this->entityManager->persist($Config);
            $this->entityManager->flush($Config);
            $this->addSuccess('Cập nhật thành công!', 'admin');

            return $this->redirectToRoute('magcube_admin_config');
        }

        return [
            'form' => $form->createView(),
        ];
    }
}
