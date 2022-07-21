import logger from './logger.js';
import {
    TYPE_LOG,
    TYPE_WARN,
    TYPE_ERROR
} from './constants.js';

logger('Test message...', TYPE_WARN);