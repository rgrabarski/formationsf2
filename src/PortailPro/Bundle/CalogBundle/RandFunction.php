<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 21/11/2014
 * Time: 10:49
 */

namespace PortailPro\Bundle\CalogBundle;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;

class RandFunction extends FunctionNode
{
   public function parse(Parser $parser)
   {
       $parser->match(Lexer::T_IDENTIFIER);
       $parser->match(Lexer::T_OPEN_PARENTHESIS);
       $parser->match(Lexer::T_CLOSE_PARENTHESIS);
   }

    /**
     * @param SqlWalker $sqlWalker
     *
     * @return string
     */
    public function getSql(SqlWalker $sqlWalker)
    {
        return 'RAND()';
    }
}
