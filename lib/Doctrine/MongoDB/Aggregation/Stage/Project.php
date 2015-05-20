<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <http://www.doctrine-project.org>.
 */

namespace Doctrine\MongoDB\Aggregation\Stage;

use LogicException;

/**
 * Fluent interface for adding a $project stage to an aggregation pipeline.
 *
 * @author alcaeus <alcaeus@alcaeus.org>
 */
class Project extends Operator
{
    /**
     * {@inheritdoc}
     */
    public function getExpression()
    {
        return array(
            '$project' => $this->expr->getExpression()
        );
    }

    /**
     * Shorthand method to exclude the _id field.
     * @param bool $exclude
     * @return $this
     */
    public function excludeIdField($exclude = true)
    {
        return $this->field('_id')->expression(!$exclude);
    }

    /**
     * Shorthand method to define which fields to be included.
     *
     * @param array $fields
     * @return $this
     */
    public function includeFields(array $fields)
    {
        foreach ($fields as $fieldName) {
            $this->field($fieldName)->expression(true);
        }

        return $this;
    }
}
