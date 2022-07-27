<?PHP

use src\Business\UserService;
use src\Business\FamilyService;

require_once __DIR__ . '/.inc.head.ajax.php';

$famID = $userData->getFamilyID();
if(isset($_POST['user']) && isset($_POST['security-token']) && $famID > 0)
{
    $userService = new UserService();
    $family = new FamilyService();
    
    $response = $family->kickFamilyMember($_POST);
    
    require_once __DIR__ . '/.inc.foot.ajax.php';
    $twigVars['response'] = $response;
    
    print_r($twig->render('/src/Views/game/Ajax/.default.response.twig', $twigVars));
}
