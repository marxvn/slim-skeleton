<?php
namespace Base\Handlers;

use Base\Utils;
use Base\Contracts\LoggableInterface;
use Base\Contracts\ViewableInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Handlers\NotFound;

class NotFoundHandler extends NotFound implements LoggableInterface, ViewableInterface
{
    use Utils\ViewableAware;
    use Utils\LoggableAware;

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        $this->logger->warning('Page Not Found', [
            $request->getMethod() => (string) $request->getUri()->withPath('')->withQuery('')->withFragment('')
        ]);

        return parent::__invoke($request, $response);
    }

    protected function renderHtmlNotFoundOutput(ServerRequestInterface $request)
    {
        if (is_null($this->view)) {
            return parent::renderHtmlNotFoundOutput($request);
        }

        $homeUrl = (string) $request->getUri()->withPath('')->withQuery('')->withFragment('');
        $title = 'Page Not Found';
        $desc = implode('<br>', [
            'The page you are looking for could not be found. Check the address bar to ensure your URL is spelled correctly.',
            'If all else fails, you can visit our home page at the link below.'
        ]);

        $this->view->addData(compact('title', 'desc', 'homeUrl'));

        return $this->view->render('error::404');
    }
}
